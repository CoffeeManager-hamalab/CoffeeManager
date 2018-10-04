<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

// �J���҂̂݋���
  Gate::define('system-only', function ($user) {
    return ($user->role == 1);
  });
  // �Ǘ��҈ȏ�i�Ǘ��ҁ��V�X�e���Ǘ��ҁj�ɋ���
  Gate::define('admin-higher', function ($user) {
    return ($user->role > 0 && $user->role <= 5);
  });
  // ��ʃ��[�U�ȏ�i�܂�S�����j�ɋ���
  Gate::define('user-higher', function ($user) {
    return ($user->role > 0 && $user->role <= 10);
  });

    }
}