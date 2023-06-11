<?php

namespace App\Repositories;

use App\Models\SignIn;

interface SignInInterface
{
    /*
     *  create(array $data): User: Bu yöntem, verilen verilerle bir kullanıcı oluşturur ve oluşturulan kullanıcı nesnesini döndürür.
     *  $data parametresi, kullanıcı oluşturmak için gereken bilgileri içeren bir dizi olarak kabul edilir.
     *
     *  update(User $user, array $data): User: Bu yöntem, belirtilen kullanıcının bilgilerini verilen verilere göre günceller ve güncellenmiş
     *  kullanıcı nesnesini döndürür. $user parametresi güncellenmek istenen kullanıcıyı temsil eder, $data parametresi ise güncellenmiş bilgileri
     *  içeren bir dizi olarak kabul edilir.
     *
     *  delete(User $user): void: Bu yöntem, belirtilen kullanıcıyı veritabanından siler. $user parametresi silinmek istenen kullanıcıyı temsil eder.
     *  Bu yöntem geriye bir değer döndürmez (void).
     *
     *   getById($id): ?User: Bu yöntem, belirli bir kullanıcı kimliği ($id) ile eşleşen kullanıcıyı getirir. Eğer kimlikle eşleşen bir kullanıcı bulunursa,
     *   bu kullanıcı nesnesini döndürür. Aksi takdirde, null döndürür.
     *
     *  getAll(): array: Bu yöntem, tüm kullanıcıları getirir ve bu kullanıcıları bir dizi olarak döndürür.
     *
     */
    public function create(array $data): SignIn;

    public function update(SignIn $signIn, array $data): SignIn;

    public function delete(SignIn $signIn): bool;

    public function getById($id): ?SignIn;

    public function getAll();
}
