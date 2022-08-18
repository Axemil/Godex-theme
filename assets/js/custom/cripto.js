$(function(){
    $.get( "https://api.godex.io/api/v2/coins-market?convert=USD", function( data ) {
        let arrayCripto = data.coins.USD.slice(0, 10).map(item => {
            return `<div class="exchange_list_item">
                        <div class="exchange_name">
                            <img src="${item.icon}" alt="crypto icon">
                            <span>${item.code}</span>
                        </div>
                        <div class="exchange_price">${item.price}</div>
                        <div class="exchange_volume">${item.volume}</div>
                        ${item.percent_change_24h > 0 ? `<div class="exchange_change exchange_positive">+${item.percent_change_24h}%</div>` : `<div class="exchange_change">${item.percent_change_24h}%</div>`}
                    </div>`;
        });
        let sideBarTable = data.coins.USD.slice(0, 6).map(item => {
            return `<div class="sidebarTableBlockList">
                        <div class="sidebarTableItem">
                            <div class="iconTable">
                                <img src="${item.icon}" alt="crypto icon">
                                ${item.code}
                            </div>
                            <div class="priceItem">
                                ${item.price}
                            </div>
                            ${item.percent_change_24h > 0 ? `<div class="valueItem exchange_positive">+${item.percent_change_24h}%</div>` : `<div class="valueItem">${item.percent_change_24h}%</div>`}
                        </div>
                    </div>`;});
        $(".exchange_item_left_side").append(arrayCripto.slice(0, 5));
        $(".exchange_item_right_side").append(arrayCripto.slice(5, 10));
        $(".sidebarTableBlock").append(sideBarTable);
    });
})