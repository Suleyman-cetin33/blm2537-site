/**
 * openLightbox: Tıklanan fotoğrafın büyük versiyonunu tam ekran olarak gösterir.
 * @param {HTMLElement} element - Tıklanan galeri öğesinin (div.galeri-item) kendisi.
 */
function openLightbox(element) {
    // 1. Büyük fotoğrafın yolunu, img etiketindeki 'data-large-src' özelliğinden al.
    const largeSrc = element.querySelector('img').getAttribute('data-large-src');

    // 2. Lightbox'ın (tam ekran gösterim penceresinin) HTML yapısını oluştur.
    // 'js-lightbox' ID'si ve 'kapat-butonu' sınıfı, CSS ve JS'te hedef almak için kritik.
    const lightboxHTML = `
        <div id="js-lightbox" class="lightbox" onclick="closeLightbox(event)">
            <span class="kapat-butonu">&times;</span>
            <img src="${largeSrc}" alt="Büyütülmüş Galeri Fotoğrafı">
        </div>
    `;

    // 3. Oluşturulan Lightbox yapısını sayfanın body etiketinin sonuna ekle.
    document.body.insertAdjacentHTML('beforeend', lightboxHTML);
}

/**
 * closeLightbox: Lightbox penceresini kapatır.
 * @param {MouseEvent} event - Tıklama olayı bilgisi.
 */
function closeLightbox(event) {
    // Tıklamanın doğrudan Lightbox arka planına (id='js-lightbox')
    // veya kapatma butonuna (class='kapat-butonu') yapıldığını kontrol et.
    if (event.target.id === 'js-lightbox' || event.target.classList.contains('kapat-butonu')) {

        const lightbox = document.getElementById('js-lightbox');

        // Lightbox elementini bulduysak, onu DOM'dan kaldır.
        if (lightbox) {
            lightbox.remove();
        }
    }
}