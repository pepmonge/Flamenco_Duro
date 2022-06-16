describe('Testeo de la funcione JavaScript que carga la tabla con la informacion de contacto en la pagina contacto', function () {
    function testeo(salidaEsperada) {
        it('debería devolver = ' + salidaEsperada, function () {
            expect(cargarTabla(entradas)).toEqual(salidaEsperada);
        });    }
            let entradas =
            {
                nombre: 'Flamenco Duro',
               
            }  
    let salidasEsperadas = 'Nombre: Flamenco Duro';
    testeo(salidasEsperadas);
}); 

describe('Testeo de la funcione JavaScript que carga datos de contacto en el footer', function () {
    function testeo(salidaEsperada) {
        it('debería devolver = ' + salidaEsperada, function () {
            expect(cargarPie(entradas)).toEqual(salidaEsperada);
        });    }
            let entradas =
            {
                nombre: 'Flamenco Duro',
                creador: 'Creaciones Oripando'
            }  
    let salidasEsperadas = 'Nombre: Flamenco Duro | Creador: Creaciones Oripando';
    testeo(salidasEsperadas);
}); 