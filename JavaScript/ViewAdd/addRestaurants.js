
const showOneBeOne = 1
const hideOtherBegin = 2
const allStockView = 3

const hideStockView = () => {
    for( let i = hideOtherBegin; i <= allStockView; i++)
        $('#stockView' + i).hide()
}

const showStockView = () => {
    let btnMore = $('#btnMore')
    let showView = 1
    btnMore.click( () => {
        showView += showOneBeOne
        $('#stockView' + showView).show()
        showView === allStockView ? btnMore.hide() : null
    })
    
}

const hoveView = () => {
    let view = $('.view')
    view.hover(
        function () {
            $(this).css({ 
                border : "4px solid blue",
                width : "350px"
            })
        }, function () {
            $(this).css( {
                border : "4px solid #000",
                width : "340px"
            })
        }
    )
}

globalThis.onload = () => {
    hideStockView()
    showStockView()
    hoveView()
}