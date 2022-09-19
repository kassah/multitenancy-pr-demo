<?php
namespace App\Http;

use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder as MultitenancyTenantFinder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;

use Illuminate\Http\Request;

class TenantFinder extends MultitenancyTenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request): ?Tenant
    {
        $tenantId = optional(auth()->user())->tenant_id;
        if (!$tenantId) {
            return null; // No tenant, no need to search db.
        }
        $tenant = $this->getTenantModel()->find($tenantId);
        return $tenant;
    }
}
