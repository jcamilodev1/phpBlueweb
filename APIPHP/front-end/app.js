const resultado = document.getElementById("resultado")
const obtener = moneda =>{
  fetch(`http://localhost/phpMsql/APIPHP/back-end/${moneda}`)
  .then(datos =>datos.json())
  .then(datos=>{
    //console.log(datos)
    resultado.innerHTML=""
    datos.forEach(element => {
      //console.log(element)
      resultado.innerHTML +=`<li>Precio: ${element.precio} Fecha: ${element.fecha}</li>`
    });
    
  })
}
