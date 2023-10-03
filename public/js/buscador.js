(function(){
  const p = document.createElement('p');
  document.addEventListener('DOMContentLoaded',()=>{
    
    const buscador = document.querySelector("#buscador");
    
    buscador.addEventListener("input",(e)=>{
     const query = e.target.value
      if(query === ""){
        limpiarResultados();
      }else{
        consultarBusqueda(query);
      }
    })
  })

  async function consultarBusqueda(busqueda){

    const busquedaUser = await fetch(`/buscador?query=${busqueda}`)
    const resultado = await busquedaUser.json()
    mostrarDatos(resultado);
  }

  function mostrarDatos(datos){

    const resultadosBusqueda = document.querySelector("#resultadosBusqueda")
    resultadosBusqueda.innerHTML = "";

    if(datos.length > 0){
      datos.forEach(element => {
        
        p.classList.add("py-5");
        p.innerHTML = `<a href="/${element.username}">${element.username}</a>`;
        resultadosBusqueda.appendChild(p);
      });
    }else{
     
      p.classList.add("py-5");
      p.innerHTML = `No hay datos`;
      resultadosBusqueda.appendChild(p);
      
    }
  }
  
  function limpiarResultados() {
    const resultadosBusqueda = document.querySelector("#resultadosBusqueda");
    resultadosBusqueda.innerHTML = "";
}

})();