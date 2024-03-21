window.addEventListener('load', () => {
    const frame = document.querySelector('.frame');
    const iframe = frame.querySelector('iframe');
    const infoFrame = iframe.getBoundingClientRect();
    
    const divCircle = document.createElement('div');
    const chemin = './assets/circle.svg';
    
    fetch(chemin)
      .then(res => {
        if (res.ok) {
          return res.text();
        } else {
          throw new Error("Erreur de chargement du fichier : " + res.status);
        }
      })
      .then(contenu => {
        const root = document.documentElement;
  
        const parser = new DOMParser();
        const SVG = parser.parseFromString(contenu, "image/svg+xml");
  
        const ellipse = SVG.querySelector("ellipse");
        const coteFrame = infoFrame.height || infoFrame.width;
  
        const KMcote = 40000 / coteFrame;
        const KM = 22;
  
        const rayonX = Math.round((((coteFrame / 2) * KM) / KMcote));
        const rayonY = rayonX * 0.7;
  
        ellipse.setAttribute('rx', rayonX + "px");
        ellipse.setAttribute('ry', rayonY + "px");
        ellipse.setAttribute('fill', 'red');
        ellipse.setAttribute('stroke', 'red');
  
        const SVGString = new XMLSerializer().serializeToString(SVG);
        divCircle.style.left = infoFrame.x + 'px';
        divCircle.style.top = infoFrame.y + 'px';
        divCircle.style.height = coteFrame + 'px';
        divCircle.style.width = coteFrame + 'px';
        divCircle.style.background = `url("data:image/svg+xml;base64,${btoa(SVGString)}")`;
        divCircle.className = "circle";
        frame.appendChild(divCircle);
      })
      .catch(error => {
        console.error("Une erreur s'est produite : " + error.message);
      });
});