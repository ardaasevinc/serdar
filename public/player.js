// Özel JavaScript Geliştirmeleri
document.addEventListener('DOMContentLoaded', function() {
    console.log('Player script loaded.');
    // Buraya özel JavaScript kodlarınızı ekleyebilirsiniz
});

function toggleCollapse(sectionId) {
    const section = document.getElementById(sectionId);
    const icon = document.getElementById(`icon-${sectionId}`);
    
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        icon.textContent = '-';
    } else {
        section.classList.add('hidden');
        icon.textContent = '+';
    }
}

// Tab switching functionality
function switchTab(tabName) {
    // Tüm tab içeriklerini gizle
    document.querySelectorAll('[id^="content-"]').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Tüm tab butonlarını pasif yap
    document.querySelectorAll('[id^="tab-"]').forEach(tab => {
        tab.classList.remove('text-white', 'border-emerald-500');
        tab.classList.add('text-gray-400');
    });
    
    // Seçilen tab'i aktif yap
    const selectedTab = document.getElementById(`tab-${tabName}`);
    selectedTab.classList.remove('text-gray-400');
    selectedTab.classList.add('text-white', 'border-b-2', 'border-emerald-500', '-mb-px');
    
    // Seçilen içeriği göster
    const selectedContent = document.getElementById(`content-${tabName}`);
    selectedContent.classList.remove('hidden');
} 