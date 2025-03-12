import './bootstrap';

document.addEventListener('livewire:initialized', function () {
    Livewire.on('sidebarToggled', function (styleClass) {
        console.log('Sidebar toggled, new style class:', styleClass);
        
        // Megkeressük a tartalom konténert
        const contentContainer = document.getElementById('content-container');
        
        if (contentContainer) {
            // Régi stílusok eltávolítása
            contentContainer.classList.remove('ml-64', 'ml-16');
            // Új stílus hozzáadása
            contentContainer.classList.add(styleClass);

            console.log(styleClass);
        } else {
            console.error('Content container not found with ID: content-container');
        }
    });
});