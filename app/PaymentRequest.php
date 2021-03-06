<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class PaymentRequest extends Model
    {

        protected $fillable = [
            'id',
            'user_id',
            'description',
            'image',
            'amount'
        ];

        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function RequestUsers()
        {
            return $this->hasMany('App\RequestsUsers', 'request_id');
        }

        public function bankAccount()
        {
            return $this->belongsTo('App\BankAccount');
        }
    }
