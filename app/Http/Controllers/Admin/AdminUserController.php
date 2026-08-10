<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('services')->latest();

        if ($request->filled('service_id')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->where('services.id', $request->service_id);
            });
        }

        $users = $query->paginate(20)->withQueryString();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('admin.users.index', compact('users', 'services'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,client',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $serviceId) {
                $user->services()->attach($serviceId, [
                    'assigned_at' => now(),
                    'status' => 'active',
                ]);
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load('services');
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.show', compact('user', 'services'));
    }

    public function edit(User $user)
    {
        $user->load('services');
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.edit', compact('user', 'services'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,client',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        $user->services()->sync([]);
        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $serviceId) {
                $user->services()->attach($serviceId, [
                    'assigned_at' => now(),
                    'status' => 'active',
                ]);
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function updateServiceStatus(Request $request, User $user, Service $service)
    {
        $validated = $request->validate([
            'service_status' => 'required|in:pending,under_review,processing,complete',
        ]);

        $user->services()->updateExistingPivot($service->id, [
            'service_status' => $validated['service_status'],
        ]);

        if ($validated['service_status'] === 'complete') {
            try {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ServiceCompleteEmail($service, $user));
            } catch (\Exception $e) {
                \Log::error('Service complete email failed: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Service status updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->services()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
