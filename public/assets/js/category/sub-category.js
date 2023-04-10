$(document).ready(function () {

    var table = $('.sub_category_datatable').DataTable();

    $('#sub-category-modal-btn').click(function () {

        $('#sub-category-modal').modal('show');
    });


    $(function () {
        let treeview = {
            resetBtnToggle: function () {
                $(".js-treeview")
                    .find(".level-add")
                    .find("span")
                    .removeClass()
                    .addClass("fa fa-plus");
                $(".js-treeview")
                    .find(".level-add")
                    .siblings()
                    .removeClass("in");
            },
            addSameLevel: function (target) {
                // let ulElm = target.closest("ul li");
                let parent_id = target
                    .closest("[data-level]")
                    .attr("parent-id");
                let ulElm = target.closest("[data-level]");
                $('.nodes-main').remove();
                ulElm.append($("#levelMarkup").html());
                $('.addBtn').removeClass('d-none');
                $('#parent_id').val(parent_id);

            },
            addSubLevel: function (target) {
                let liElm = target.closest("li");
                let parent_id = liElm.find("[data-level]").attr("lavel-id");
                $('.nodes-main').remove();
                ulElm = target.closest("[data-level]");
                ulElm.append($("#levelMarkup").html());
                $('.addBtn').removeClass('d-none');
                $('#parent_id').val(parent_id);


            },
            removeLevel: function (target) {
                let node_id = target.attr('sub-cat-id');
                let node_name = target.attr('sub-cat-name');
                let liElm = target.closest("li");
                $('.nodes-main').remove();
                ulElm = target.closest("[data-level]");
                ulElm.append($("#levelMarkup").html());
                $('#myInput').val(node_name);
                $('#node_id').val(node_id);
                $(".nodes-main").css({"right": "-236px"});
                $('.addBtn').addClass('d-none');
                addNodes(null);
            }
        };

        // Treeview Functions
        $(".js-treeview").on("click", ".level-add", function () {
            $(this).find("span").toggleClass("fa-plus").toggleClass("fa-times text-danger");
            $(this).siblings().toggleClass("in");
        });

        // Add same level
        $(".js-treeview").on("click", ".level-same", function () {

            console.log($(this))
            treeview.addSameLevel($(this));
            treeview.resetBtnToggle();
        });

        // Add sub level
        $(".js-treeview").on("click", ".level-sub", function () {
            treeview.addSubLevel($(this));
            treeview.resetBtnToggle();
        });
        // Remove Level
        $(".js-treeview").on("click", ".level-remove", function () {
            treeview.removeLevel($(this));
        });

        // Selected Level
        $(".js-treeview").on("click", ".level-title", function () {
            let isSelected = $(this).closest("[data-level]").hasClass("selected");
            !isSelected && $(this).closest(".js-treeview").find("[data-level]").removeClass("selected");
            $(this).closest("[data-level]").toggleClass("selected");
        });
    });


    $(document).on('click', '.add-node-btn', function () {
        var formData = $('#category-node-form').serializeArray();
        if ($('#node_id').val() == '') {
            if ($('.category_node_list').length > 0) {
                $.ajax({
                    type: "POST",
                    url: "/add-category-node",
                    data: formData,
                    success: function (data) {
                        if (data.status == 200) {

                            window.location.reload()
                        }
                    }
                })
            } else {
                alert('Please add sub category name')
            }
        } else {
            $.ajax({
                type: "POST",
                url: "/add-category-node",
                data: formData,
                success: function (data) {
                    if (data.status == 200) {

                        window.location.reload()
                    }
                }
            })
        }
    })


    // Create a "close" button and append it to each list item
    var myNodelist = $('.to-do-list LI');
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }

    // Click on a close button to hide the current list item
    $(document).on('click', '.to-do-list .close', function () {
        $(this).parent().remove()
    });

    // Add a "checked" symbol when clicking on a list item
    var list = document.querySelector('ul');
    list.addEventListener('click', function (ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
        }
    }, false);

    // Create a new list item when clicking on the "Add" button
    $(document).on('click', '.addBtn', function () {

        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        var x = document.createElement("INPUT");
        x.setAttribute("type", "hidden");
        x.setAttribute("value", inputValue);
        x.setAttribute("class", 'category_node_list');
        x.setAttribute("name", 'children_nodes[]');
        li.appendChild(t);
        li.appendChild(x);
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function () {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    })


    $(document).on('click', '.close-node-text', function () {
        $('.nodes-main').remove();
    })

});
