
const Market = {
    data: {
        htmlCard: "",
    },
    func: {
        init: function () {
            Market.func.getAllItems();
        },
        getAllItems: function () {
            fetch("../controller/search.php", {
                method: "POST",
                mode: "cors",
                credentials: "include"
            }).then(Response => {
                return Response.json()
            }).then(data => {
                data.forEach(item => {
                    Market.data.htmlCard +=
                        `<div class="post">
                        <a href='./view.php'>
                        <a href='./view.php?id=${item.id}'>
                <img src='${item.image}'>
                <div class='test'>${item.title}</div>
                <div class='introduce'>${item.content}</div>
                    </a>
            
                    <div class="userlogo">
                        <img src="${item.avatar}">
                    </div>

                    <div class="username">${item.P_username}</div>
                    <div class="price">
                        <p>RM${item.price}</p>
                    </div>
            
                    <div class="iconfont icon-gouwuchekong" onclick='goBuy(${item.id})'></div>
                    <div class="iconfont icon-shoucang" onclick="collect(${item.id})"></div>
                    <h5 onclick='dispayReport()'>...</h5>
                    <a href="#" class="messbox">
                        <div class="iconfont icon-xiaoxi"></div>
                    </a>
                    </div>

                    <div id="light" class="reportpage">
        <div class="close" onclick="closeReport()">X</div>
        <form action="#" method="post">
            <div class="pornographic">
                Pornographic <input type="checkbox">
            </div>
            <div class="fakegoods">
                Fake goods<input type="checkbox">
            </div>
            <div class="informationleakage">
                Information leakage <input type="checkbox">
            </div>
            <div class="dangerous">
                Dangerous <input type="checkbox">
            </div>

            <div class="fraudandscams">
                Fraud and scams<input type="checkbox">
            </div>
            <div class="verbalabouseorharassment">
                Verbal abouse or harassment<input type="checkbox">
            </div>

            <div class="otherreason">
                Other reason <br>
                <textarea name="reson"></textarea>
            </div>

            </table>
            <div class="reset">
                <input type="reset" value="reset">
            </div>
            <div class="submit">
                <input type="submit" value="Save and Submit" >
            </div>

        </form>
    </div>`
                });
                const posts = document.querySelector("#posts");
                posts.innerHTML = Market.data.htmlCard;
            });
        }
    }
}


// report itenms
function dispayReport() {
    document.getElementById('light').classList.add("active");
}
function closeReport() {
    document.getElementById('light').classList.remove("active");
}


