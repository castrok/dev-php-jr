<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $client_id
 * @property string|null $client_status
 * @property string|null $client_name
 * @property string|null $client_cpf
 * @property string|null $client_rg
 * @property string|null $client_birth_date
 * @property string|null $client_email
 * @property string|null $client_phone
 * @property string|null $client_cep
 * @property string|null $client_address
 * @property string|null $client_neighborhood
 * @property string|null $client_city
 * @property string|null $client_state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	protected $primaryKey = 'client_id';

	protected $fillable = [
		'client_status',
		'client_name',
		'client_cpf',
		'client_rg',
		'client_birth_date',
		'client_email',
		'client_phone',
		'client_cep',
		'client_address',
		'client_neighborhood',
		'client_city',
		'client_state'
	];
}
