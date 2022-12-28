// const callbackFunction = () => {
//     console.log('Veikia');
// }

//AddEventListener metodas priskiria norimą funkciją prie pasirinkto įvykio.
//document.querySelector('.submit-button').addEventListener('click', callbackFunction);

document.querySelector('.submit-button').addEventListener('click', (event) => {
    //Window kintamasis yra objektas kuriame registruojami su naršyklės langu susiję įvykiai ir kita informacija (pvz lango plotis ar aukštis)
    console.log(window);
});

//Puslapio slinkimo žemyn įvykis

window.addEventListener('scroll', () => {
    console.log('Veikia');
});