<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <p class="section-label mb-2">Mise à jour</p>
        <h1 class="h2 mb-0">Modifier un apprenant</h1>
    </div>
    <div class="content-card p-4">
        <form method="POST" action="{{ route('apprenants.update', $apprenant) }}" enctype="multipart/form-data" class="row g-4">
            @csrf
            @method('PUT')
            @include('apprenants._form')
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary">Enregistrer les changements</button>
                <a href="{{ route('apprenants.show', $apprenant) }}" class="btn btn-outline-secondary">Retour</a>
            </div>
        </form>
    </div>
</x-app-layout>
