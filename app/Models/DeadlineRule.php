<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeadlineRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'taxpayer_type',
        'requires_sales_tax',
        'requires_withholding_agent',
        'sector',
        'deadline_type',
        'frequency',
        'day_of_month',
        'month_of_quarter',
        'custom_date_rule',
        'statutory_basis',
        'is_active',
    ];

    protected $casts = [
        'requires_sales_tax' => 'boolean',
        'requires_withholding_agent' => 'boolean',
        'is_active' => 'boolean',
        'custom_date_rule' => 'array',
    ];

    public function scopeForTaxpayer($query, $taxpayerType)
    {
        return $query->where('taxpayer_type', $taxpayerType);
    }

    public function scopeForSector($query, $sector)
    {
        return $query->where(function ($q) use ($sector) {
            $q->where('sector', $sector)->orWhereNull('sector');
        });
    }

    public function scopeWithSalesTax($query)
    {
        return $query->where('requires_sales_tax', true);
    }

    public function scopeWithWithholdingAgent($query)
    {
        return $query->where('requires_withholding_agent', true);
    }
}
