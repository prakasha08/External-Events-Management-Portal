<?php
namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable
    {
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var list<string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ];
        }
        public function faculty()
    {
        return $this->hasOne(faculty::class, 'user_id');
    }

    // Define the relationship with the Student model
    public function student()
    {
        return $this->hasOne(student::class, 'user_id');
    }

    // Define the relationship with the Admin model
    public function admin()
    {
        return $this->hasOne(admin::class, 'user_id');
    }
    }
