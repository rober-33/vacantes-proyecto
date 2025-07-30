fetch('vacantes.json')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('vacantes-container');

    data.forEach(vacante => {
      const card = document.createElement('div');
      card.className = 'tarjeta';

      card.innerHTML = `
        <img src="${vacante.imagen}" alt="${vacante.titulo}">
        <h2>${vacante.titulo}</h2>
        <p>${vacante.descripcion}</p>
        <a href="#" class="btn">Ver Vacantes</a>
      `;

      container.appendChild(card);
    });
  })
  .catch(error => {
    console.error('Error al cargar vacantes:', error);
    document.getElementById('vacantes-container').innerHTML = '<p>Error al cargar las vacantes.</p>';
  });