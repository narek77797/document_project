<?php

namespace App\Models;

use App\Services\User\Dto\CreateUserDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string|null $display_name
 * @property string|null $telegram_username
 * @property string $password
 * @property mixed $id
 * @property string $email
 * @property string $language
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function createUser(CreateUserDTO $dto): User
    {
        $user = new self();

        $user->setUsername($dto->email);
        $user->setPassword($dto->password);
        $user->setDisplayName($dto->displayName);
        $user->setTelegramUsername($dto->telegramUsername);
        $user->setLanguage($dto->language);

        return $user;
    }

    public function setUsername(string $email): void
    {
        $this->email = $email;
    }

    public function setDisplayName(?string $displayName): void
    {
        $this->display_name = $displayName;
    }

    public function setTelegramUsername(?string $telegramUsername): void
    {
        $this->telegram_username = $telegramUsername;
    }

    public function setPassword(string $password): void
    {
        $this->password = bcrypt($password);
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }
}
