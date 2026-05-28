<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <p class="section-label mb-2">Profil</p>
        <h1 class="h2 mb-2">Parametres du compte</h1>
        <p class="text-muted mb-0">Mettez a jour vos informations personnelles et votre mot de passe.</p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="content-card p-4">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="content-card p-4">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        <div class="col-12">
            <div class="content-card p-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
