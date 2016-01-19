<?php


namespace App;


use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HasShops
 * @package App
 * @mixin Model
 */
trait HasShops
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

    /**
     * @param Shop $shop
     * @return $this|Model
     */
    public function authorizeToShop(Shop $shop)
    {
        if (is_string($shop)) {
            return $this->shops()->save(
                Shop::whereName($shop)->firstOrFail()
            );
        }

        if ($shop instanceof Shop) {
            return $this->shops()->save($shop);
        }

        return $this;
    }
}