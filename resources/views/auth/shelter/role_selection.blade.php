<div>
        <form method="POST" action="{{ route('registration.shelter.role_selection_store') }}">
            @csrf
            <button type="submit" name="role_shelter" value="shelterWorker">Dolgozó</button>    
            <button type="submit" name="role_shelter" value="shelterOwner">Tulajdonos</button>
        </form>
</div>