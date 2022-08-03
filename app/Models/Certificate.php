<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['expiry_date'] ?? false) {
            $query->where('expiry_date', 'like', '%' . request('expiry_date') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('company_id', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%')
                ->orWhere('product_code', 'like', '%' . request('search') . '%')
                ->orWhere('expiry_date', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
