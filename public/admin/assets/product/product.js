$(() => {
    ClassicEditor.create(document.querySelector("#description"), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    })
        .then((editor) => {
            window.editor = editor;
        })
        .catch((err) => {
            console.error(err.stack);
        });


    renderSizes(sizes);
    appendSizesToForm();
    var modal = $(".modal");
    var btn = $(".clickmodal");

    btn.click(function () {
        modal.toggle();
    });
    $(window).on("click", function (e) {
        if ($(e.target).is(".modal")) {
            modal.hide();
        }
    });

    function renderSizes(sizes) {
        for (let size of sizes) {
            renderSize(size);
        }
    }

    function getSizeIndex(sizes, id) {
        let index = _.findIndex(sizes, function (o) {
            return o.id == id;
        });

        return index;
    }

    function removeSize(sizes, id) {
        let index = getSizeIndex(sizes, id);
        if (index >= 0) {
            $(`#product-size${sizes[index].id}`).remove();
            sizes.splice(index, 1);
        }
    }

    function addSize() {
        let size = {
            id: Date.now(),
            size: "30",
            quantity: 1,
        };
        sizes = [...sizes, size];
        renderSize(size);
    }

    function appendSizesToForm() {
        $("#inputSize").val(JSON.stringify(sizes));
    }

    $(document).on("click", ".btn-remove-size", function () {
        let id = $(this).data("id");
        removeSize(sizes, id);
        appendSizesToForm();
    });

    $(document).on("click", ".btn-add-size", function () {
        addSize();
        appendSizesToForm();
    });

    $(document).on("keyup", ".input-size", function () {
        let id = $(this).data("id");
        let size = $(this).val();
        let index = getSizeIndex(sizes, id);
        console.log(1);
        if (index >= 0) {
            sizes[index].size = size;
        }
        appendSizesToForm();
    });

    function renderSize(size) {
        let html = `<div class="product-item-size" id="product-size${size.id}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Size</label>
                                    <input value="${size.size}" type="text" class="form-control input-size" data-id="${size.id}">
                                </div>

                                <div class="col-sm-4">
                                    <label>Quantity</label>
                                    <input type="number" value="${size.quantity}" class="form-control input-quantity" data-id="${size.id}">
                                </div>
                                <div class="col-sm-4">
                               
                                    <button type="button" class="btn btn-danger btn-remove-size" data-id="${size.id}">X</button>
                                </div>
                            </div>
                            </div>
                            `;
        $("#AddSizeModalBody").append(html);
    }

    $(document).on("keyup", ".input-quantity", function () {
        let id = $(this).data("id");
        let quantity = $(this).val();
        let index = getSizeIndex(sizes, id);

        if (index >= 0) {
            sizes[index].quantity = quantity;
        }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show-image").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image-input").change(function () {
        readURL(this);
    });
});
