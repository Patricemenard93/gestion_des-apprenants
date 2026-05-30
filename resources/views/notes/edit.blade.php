<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <p class="section-label mb-2">Mise à jour</p>
        <h1 class="h2 mb-0">Modifier une note</h1>
    </div>
    <div class="content-card p-4">
        <form method="POST" action="{{ route('notes.update', $note) }}" class="row g-4">
            @csrf
            @method('PUT')
            @include('notes._form')
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary">Enregistrer les changements</button>
                <a href="{{ route('notes.show', $note) }}" class="btn btn-outline-secondary">Retour</a>
            </div>
        </form>
    </div>
</x-app-layout>
