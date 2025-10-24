<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $top_title
 * @property string|null $top_content
 * @property string|null $top_image
 * @property string|null $top_image_original_name
 * @property string|null $top_image_file_size
 * @property string|null $middle_first_image
 * @property string|null $middle_first_image_original_name
 * @property string|null $middle_first_image_file_size
 * @property string|null $middle_second_image
 * @property string|null $middle_second_image_original_name
 * @property string|null $middle_second_image_file_size
 * @property string|null $bottom_title
 * @property string|null $bottom_content
 * @property string|null $bottom_button_text
 * @property string|null $bottom_button_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereBottomButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereBottomButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereBottomContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereBottomTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleFirstImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleFirstImageFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleFirstImageOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleSecondImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleSecondImageFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereMiddleSecondImageOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereTopContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereTopImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereTopImageFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereTopImageOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereTopTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AboutUsPage whereUpdatedAt($value)
 */
	class AboutUsPage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $file_name
 * @property string|null $file_original_name
 * @property string|null $file_size
 * @property string|null $file_extention
 * @property string|null $remember_token
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereFileExtention($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $min_price
 * @property string|null $max_price
 * @property int $status
 * @property string|null $icon_path
 * @property string|null $file_original_name
 * @property string|null $file_extension
 * @property int|null $file_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BundleImage> $bundleImages
 * @property-read int|null $bundle_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BundleReview> $bundleReviews
 * @property-read int|null $bundle_reviews_count
 * @property-read \App\Models\BundleImage|null $firstImage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereIconPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bundle whereUpdatedAt($value)
 */
	class Bundle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $bundle_id
 * @property string|null $image_url
 * @property string|null $file_original_name
 * @property string|null $file_extension
 * @property int|null $file_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleImage whereUpdatedAt($value)
 */
	class BundleImage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $bundle_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleProduct whereUpdatedAt($value)
 */
	class BundleProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $bundle_id
 * @property int $user_id
 * @property int $rating
 * @property string $review
 * @property int $is_approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Bundle $bundle
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BundleReview whereUserId($value)
 */
	class BundleReview extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $client_image
 * @property string|null $file_original_name
 * @property string|null $file_size
 * @property string|null $file_extension
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereClientImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $iso2
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $region
 * @property int|null $region_id
 * @property string|null $emoji
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereEmoji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $code
 * @property string $type
 * @property string $value
 * @property string $min_purchase
 * @property int|null $usage_limit
 * @property int $used
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereMinPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereUsageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cupon withoutTrashed()
 */
	class Cupon extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $file_name
 * @property string|null $file_original_name
 * @property string|null $file_size
 * @property string|null $file_extention
 * @property int $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereFileExtention($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editor withoutTrashed()
 */
	class Editor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $banner_1_cover_image
 * @property string|null $banner_1_cover_original_name
 * @property string|null $banner_1_cover_extension
 * @property int|null $banner_1_cover_size
 * @property string|null $banner_1_featured_image
 * @property string|null $banner_1_featured_original_name
 * @property string|null $banner_1_featured_extension
 * @property int|null $banner_1_featured_size
 * @property string|null $banner_1_title
 * @property string|null $banner_1_description
 * @property string|null $banner_1_btn_text
 * @property string|null $banner_1_btn_url
 * @property string|null $banner_2_image
 * @property string|null $banner_2_image_original_name
 * @property string|null $banner_2_image_extension
 * @property int|null $banner_2_image_size
 * @property string|null $banner_2_title
 * @property string|null $banner_2_description
 * @property string|null $banner_2_btn_text
 * @property string|null $banner_2_btn_url
 * @property int|null $product_1_id
 * @property string|null $product_1_btn_text
 * @property string|null $product_1_btn_url
 * @property int|null $product_2_id
 * @property string|null $product_2_btn_text
 * @property string|null $product_2_btn_url
 * @property int|null $product_3_id
 * @property string|null $product_3_btn_text
 * @property string|null $product_3_btn_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1BtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1BtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1CoverExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1CoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1CoverOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1CoverSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1FeaturedExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1FeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1FeaturedOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1FeaturedSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner1Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2BtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2BtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2Image($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2ImageExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2ImageOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2ImageSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereBanner2Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct1BtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct1BtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct2BtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct2BtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct3BtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct3BtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereProduct3Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageBody whereUpdatedAt($value)
 */
	class HomePageBody extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $btn_text
 * @property string|null $btn_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereBtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageFeaturedProduct whereUpdatedAt($value)
 */
	class HomePageFeaturedProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $short_description
 * @property string|null $button_text
 * @property string|null $button_url
 * @property string|null $image_path
 * @property string|null $file_original_name
 * @property string|null $file_extension
 * @property int|null $file_size
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomeSidebarBanner whereUpdatedAt($value)
 */
	class HomeSidebarBanner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereUpdatedAt($value)
 */
	class Inventory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Newsletter whereUpdatedAt($value)
 */
	class Newsletter extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $order_number
 * @property int|null $user_id
 * @property int|null $coupon_id
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property string|null $customer_phone
 * @property string $subtotal
 * @property string $discount
 * @property string $shipping_cost
 * @property string|null $es_ship_courier_name
 * @property string|null $es_ship_courier_service_id
 * @property string|null $es_ship_delivery_time
 * @property string $es_ship_courier_total_charge
 * @property array<array-key, mixed>|null $billing_address
 * @property array<array-key, mixed>|null $shipping_address
 * @property string $total_amount
 * @property string|null $payment_method
 * @property string $payment_status
 * @property string $order_status
 * @property string|null $transaction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetails> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereEsShipCourierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereEsShipCourierServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereEsShipCourierTotalCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereEsShipDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withoutTrashed()
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $product_name
 * @property string $price
 * @property string $subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderDetails whereUpdatedAt($value)
 */
	class OrderDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $barcode
 * @property string|null $ups_code
 * @property string $product_name
 * @property string $slug
 * @property string $sku
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $research
 * @property string|null $purchase_price
 * @property string|null $regular_price
 * @property string|null $sale_price
 * @property string|null $discount_price
 * @property string|null $discount_percentage
 * @property string|null $video_bn
 * @property string|null $video_en
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int $quantity
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $weight
 * @property string|null $weight_converted
 * @property string|null $weight_unit
 * @property string|null $length
 * @property string|null $width
 * @property string|null $height
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductBrand> $brands
 * @property-read int|null $brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $firstCategory
 * @property-read int|null $first_category_count
 * @property-read \App\Models\ProductImage|null $firstImage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Inventory|null $inventory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetails> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $productReviews
 * @property-read int|null $product_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSize> $sizes
 * @property-read int|null $sizes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StockLeadger> $stockLedgers
 * @property-read int|null $stock_ledgers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVideo> $videos
 * @property-read int|null $videos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereRegularPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereResearch($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpsCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereVideoBn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereVideoEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWeightConverted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWeightUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBrand whereUpdatedAt($value)
 */
	class ProductBrand extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $parent_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read ProductCategory|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductColor query()
 */
	class ProductColor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $image_url
 * @property string|null $file_extension
 * @property string|null $file_original_name
 * @property string|null $file_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereUpdatedAt($value)
 */
	class ProductImage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $product_id
 * @property int $product_brand_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductBrand whereProductBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductBrand whereProductId($value)
 */
	class ProductProductBrand extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $product_id
 * @property int $product_category_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductCategory whereProductId($value)
 */
	class ProductProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductColor query()
 */
	class ProductProductColor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $product_id
 * @property int $product_size_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductSize query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductSize whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductSize whereProductSizeId($value)
 */
	class ProductProductSize extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $product_id
 * @property int $product_tag_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductTag whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductProductTag whereProductTagId($value)
 */
	class ProductProductTag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $rating
 * @property string $review
 * @property int $is_approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereUserId($value)
 */
	class ProductReview extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereUpdatedAt($value)
 */
	class ProductSize extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereUpdatedAt($value)
 */
	class ProductTag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $video_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVideo whereVideoUrl($value)
 */
	class ProductVideo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $token
 * @property string|null $client_id
 * @property string|null $client_secret
 * @property string|null $client_credentials
 * @property string|null $api_url
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereApiUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereClientCredentials($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereUpdatedAt($value)
 */
	class ShippingMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $site_name
 * @property string|null $site_email
 * @property string|null $site_phone
 * @property string|null $site_description
 * @property string|null $copyright_text
 * @property string|null $logo
 * @property string|null $favicon
 * @property string|null $address
 * @property string|null $currency
 * @property string|null $minimum_order
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereCopyrightText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereMinimumOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSiteDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSiteEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereSitePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteSetting whereUpdatedAt($value)
 */
	class SiteSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $button_color
 * @property string|null $button_text
 * @property string|null $button_url
 * @property string $slider_image
 * @property string|null $file_original_name
 * @property string|null $file_extension
 * @property int|null $file_size
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereButtonColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereFileExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereFileOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereSliderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $type
 * @property int $quantity
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockLeadger whereUpdatedAt($value)
 */
	class StockLeadger extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone
 * @property string|null $profile_image
 * @property string|null $address
 * @property string|null $shipping_address
 * @property string|null $billing_address
 * @property string $password
 * @property string|null $remember_token
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUserId($value)
 */
	class Wishlist extends \Eloquent {}
}

