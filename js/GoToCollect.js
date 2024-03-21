window.addEventListener('load', () => {
    const previews = document.querySelectorAll('img#photo');
    previews.forEach(preview => {
        if (preview.hasAttribute('data-collect')) {
            const collect = preview.getAttribute('data-collect');
            const toCollect = document.createElement('a');
            const section = preview.parentElement.parentElement.parentElement;
            const sectionInfo = section.getBoundingClientRect();
            const coteImage = sectionInfo.height || sectionInfo.width;
            
            preview.style.height = `calc(${coteImage}px - 2em)`;
            preview.style.width = `calc(${coteImage}px - 2em)`;
            
            const previewInfo = preview.getBoundingClientRect();
            toCollect.href = `?a=galerie&c=${collect}`;
            toCollect.textContent = 'Aller voir la collection';
            toCollect.className = 'linkToCollect';
            toCollect.style.width = previewInfo.width + "px";
            
            preview.insertAdjacentElement("afterend", toCollect);
        }
    });
});