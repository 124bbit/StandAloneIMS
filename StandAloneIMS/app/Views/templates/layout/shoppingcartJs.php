<script>
    const dataBarang = <?= json_encode($barang) ?>;
    const barangList = document.querySelector(".tbody");
    const cartList = document.querySelector("#cartList");
    const btnPopup = document.getElementById('btnPopup');
    const forms = document.getElementById("form");
    let cart = [];
    const renderCartItems = () => {
        cartList.innerHTML = "";
        cart.forEach((brg) => {
            cartList.innerHTML += `
            <div class="row py-3">
                <div class="col-6">${brg.namaBarang}</div>
                <div class="col-4">
                    <small><a class="btn btn-sm btn-success" onclick="changeNumberBarang('plus',${parseInt(brg.idBarang)})">+</a></small>
                    <small>${brg.Jml}</small>
                    <small><a class="btn btn-sm btn-danger" onclick="changeNumberBarang('minus',${parseInt(brg.idBarang)})">-</a></small>
                </div>
                <div class="col-2">
                    <a onclick="remove(${brg.idBarang})" class="btn btn-sm btn-danger"><img src="<?= base_url("assets/bootstrap-icons/trash.svg") ?>" alt="Delete Barang"></a>
                </div>
            </div>
            
            `;
        })
        if (cart.length > 0) {
            cartList.innerHTML += `<div class="d-flex justify-content-evenly pt-4">
                <a onclick="runTransaksi()" class="btn btn-sm rounded btn-outline-success">Submit</a>
                <a onclick="removeAllBarang()" class="btn btn-sm rounded btn-outline-danger">clear</a>
            </div>`;
        }
    }
    const updateCart = () => {
        renderCartItems();
    }
    const renderBarang = () => {
        dataBarang.forEach((brg, i) => {
            barangList.innerHTML += `
            <tr>
                <td class="">${brg.namaBarang}</td>
                <td><a onclick="add(${brg.idBarang})" class="btn btn-outline-primary my-2" id="brg-${i}"> Add To Cart</a></td>
            </tr>
            `;
        })
    }
    const add = id => {
        if (cart.some((brg) => brg.idBarang === JSON.stringify(id))) {
            changeNumberBarang("plus", id);
        } else {
            const selectBrg = dataBarang.find((brg) => brg.idBarang === JSON.stringify(id));
            cart.push({
                ...selectBrg,
                Jml: 1,
            });
        }
        updateCart();
    }
    const changeNumberBarang = (act, id) => {
        cart = cart.map((brg) => {
            let oldJml = brg.Jml;
            if (brg.idBarang === JSON.stringify(id)) {
                if (act === "minus" && oldJml > 1) {
                    oldJml--;
                } else if (act === "plus" && oldJml < brg.Qty) {
                    oldJml++;
                }
            }
            return {
                ...brg,
                Jml: oldJml,
            };
        });
        updateCart();
    }
    const remove = (id) => {
        cart = cart.filter((brg) => brg.idBarang !== JSON.stringify(id));
        renderCartItems()
    }
    const removeAllBarang = () => {
        cart = [];
        renderCartItems();
    }
    const runTransaksi = () => {
        cart = cart.map((brg) => {
            brg.idBarang = parseInt(brg.idBarang);
            brg.Qty = parseInt(brg.Qty);
            brg.updated_by = parseInt(brg.updated_by);
            brg.created_by = parseInt(brg.created_by);
            return {
                idBarang: brg.idBarang,
                Jml: brg.Jml
            }
        });
        console.log(cart);
        cart.forEach((brg) => {
            forms.innerHTML += `
            <input type="number" name="idBarang[]" value=${brg.idBarang} id="" hidden>
            <input type="number" name="Jml[]" value=${brg.Jml} id="" hidden>
            `;
        })
        forms.submit();

    }
    renderBarang();
</script>