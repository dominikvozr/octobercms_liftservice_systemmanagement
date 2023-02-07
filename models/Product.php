<?php namespace Dondo\SystemManagement\Models;

use Dondo\Certification\Models\CertificationExpertInspection;
use Dondo\Qrcodes\Facades\QrcodeManager;
use Dondo\Qrcodes\Models\QRcode;
use Model;

/**
 * Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Illuminate\Database\Eloquent\Concerns\HasUuids;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_systemmanagement_products';

    /**
     * @var array Validation rules
     */
    public $rules = [
        "title" => "required",
        "type" => "required",
        "manufacturer" => "required"
    ];

    public $fillable = [
        'qrcode_id',
        'title',
        'type',
        'manufacturer',
        'year_of_production',
        'location',
        'operator',
        'address_id',
        'carrying_capacity',
        'speed',
        'ec_operator',
        'review_data',
    ];

    public $hasOne = [
        'qrcode' => [\Dondo\Qrcodes\Models\QRcode::class],
        'address' => [\Dondo\SystemManagement\Models\Address::class]
    ];

    public $hasMany = [
        'certificationExpertInspections' => CertificationExpertInspection::class,
        'certificationProfessionalInspectionProtocols' => CertificationProfessionalInspectionProtocol::class
    ];

    public function beforeCreate()
    {
        $qrcodeId = QrcodeManager::createQrcode($this->title . '-' . time());
        $this->qrcode_id = $qrcodeId;
    }

    public function beforeDelete ()
    {
        QrcodeManager::deleteQrcode($this->qrcode_id);
    }

}
