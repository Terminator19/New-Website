// PŘI NAČTENÍ STRÁNKY

let category = "All";
let current_items = 0;
let search = "";


// při načtení
$(document).ready(function () {
    $('#search-form').submit(function (e) {
        ajax();
        e.preventDefault();
    });
    ajax();
});

// kliknutí na talčítko
$("#change-page-button").click(function() {
    ajax();
});


// hledání

const searchInput = $("#search-input");
searchInput.on('input', function() {
    search = searchInput.val();
    clearAllItems();
    ajax();
});



// změna kategorie
$(".dropdown-item").click(function() {
    category = $(this).attr("category");
    $("#category-label").html(category);
    search = '';
    $("#search-input").val('');
    $(".dropdown-item.active").removeClass('active');
    $("[category='" + category + "']").addClass('active');
    clearAllItems();
    ajax();
});

function clearAllItems() {
    current_items = 0;
    $("#games-write").html('');
    $("#change-page-button").removeClass('hidden');
}

function ajax() {
    let preparedData = {
        category: category,
        current_items: current_items,
        search: search
    };
    $.ajax({
        type: "POST",
        url: "./ajax-api/games.php",
        data: preparedData,
        success: function (response) {
            let items = response.items;
            if(items.length === 0) {
                let html = '<div class="card text-center" style=" margin: 5px; border: none; height: 400px;">\n' +
                    '        <div class="card-body">\n' +
                    '            <h5 class="card-title font-weight-bold cw ">Not Found</h5>\n' +
                    '        </div>\n' +
                    '    </div>';
                $("#games-write").append(html);
            }
            current_items = response.current_items;
            items.forEach(function (item) {
                addItem(item.id, item.title, item.category, item.img);
            });
            // konec stránky, zmizení tlačítka
            if(response.nextButton === false) {
                    $("#change-page-button").addClass('hidden');
            }

        },
        error: function (error) {
            console.error("Chyba při odesílání:", error);
        }
    });
}

function addItem(id, title, category, img) {
    let html = '<div class="card text-center" style="width: 14rem; margin: 5px;"><a href="g_view.php?id=' + id + '" style="text-decoration: none;"> <div class="card-body"> <h5 class="card-title font-weight-bold cw ">' + title + '</h5> <p class="card-text cw ">' + category + '</p> <hr><img  src="components/img/games_img/' + img +'"><hr></div></a></div>';
    $("#games-write").append(html);
}