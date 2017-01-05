<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Entities{
/**
 * App\Entities\Bill
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property int $total_money
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereTotalMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereUpdatedAt($value)
 */
	class Bill extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\BillDetail
 *
 * @property int $id
 * @property int $bill_id
 * @property int $product_id
 * @property int $price
 * @property int $quanlity
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereBillId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereQuanlity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereUpdatedAt($value)
 */
	class BillDetail extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $parent_category_id
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereId($value)
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereParentCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Import
 *
 * @property int $id
 * @property int $suppliers_id
 * @property int $user_id
 * @property string $date_created
 * @property float $total_money
 * @property int $status
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereSuppliersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereDateCreated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereTotalMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereStatus($value)
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereUpdatedAt($value)
 */
	class Import extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\ImportDetail
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property int $price
 * @property int $import_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereImportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereUpdatedAt($value)
 */
	class ImportDetail extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Price
 *
 * @property int $id
 * @property int $product_id
 * @property string $date_created
 * @property float $sale
 * @property int $price
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereId($value)
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereSale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereUpdatedAt($value)
 */
	class Price extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $quanlity
 * @property int $status
 * @property int $category_id
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @property-read \App\Entities\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereQuanlity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Supply
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereUpdatedAt($value)
 */
	class Supply extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $role_id
 * @property int $active
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereActive($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\UserLogin
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $borrow
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereDateLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereBorrow($value)
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereUpdatedAt($value)
 */
	class UserLogin extends \Eloquent {}
}

