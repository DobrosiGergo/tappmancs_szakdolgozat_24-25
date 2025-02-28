   
    <div>
        <form method="POST" action="{{ route('registration.store.role') }}">
            @csrf
            <button type="submit"name="role" value="User">Örökbefogadó</button>    
            <button type="submit" name="role" value="shelter">Menhely</button>
        </form>
        
</div>
