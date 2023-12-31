const menuItems = document.querySelector(".menu-items");
const menulinks = menuItems.querySelectorAll("li");

const messagelink = document.getElementById('messages-link')
const contactlink = document.getElementById('contacts-link')

const messagelist = document.getElementById('message-list')
const contactlist = document.getElementById('Contact-list')

if (messagelink.classList.contains = "active") {
    messagelist.style.display = "block"
    contactlist.style.display = "none"
}

menulinks.forEach(link => {
    link.addEventListener('click', (e) => {
        menulinks.forEach(link => {
            link.classList.remove("active");
        })
        e.preventDefault();
        link.classList.add("active");
        if (link.id === 'messages-link') {
            messagelist.style.display = "block";
            contactlist.style.display = "none";
        } else if (link.id === 'contacts-link') {
            contactlist.style.display = "block";
            messagelist.style.display = "none";
        }
    })
});

const items = document.querySelectorAll(".item");
const chatbox = document.querySelector(".chatbox")
const container = document.querySelector('.main-content');

items.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        items.forEach(item => {
            item.classList.remove("active");
            chatbox.style.display = "none";
        })

        chatbox.style.display = "flex";
        container.style.width = "auto"
        itemName = item.querySelector(".name").textContent;
        chatHeaderName = document.querySelector(".chatheadername");
        var headerNum = item.querySelector(".headerNum").value;

        item.classList.add("active");
        chatHeaderName.textContent = itemName;

        $.ajax({
            type: "POST",
            url: "homepage.php",
            data: { "chatNum": headerNum },
            success: function () {
                $(".chat-content").load(location.href + " .chat-content");

            },
        });
    })
})

const delMsg = document.querySelectorAll(".delMsg");
delMsg.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        var receiver = document.querySelector(".receiverNum").value;

        $.ajax({
            type: "POST",
            url: "mainSQL.php",
            data: { "receiver": receiver },
            success: function () {
                $("#message-list").load(location.href + " #message-list");
            },
        });
    });
});

const delCont = document.querySelectorAll(".delCont");
delCont.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        var contNum = item.querySelector(".contNum").value;

        $.ajax({
            type: "POST",
            url: "mainSQL.php",
            data: { "contNum": contNum },
            success: function () {
                $("#Contact-list").load(location.href + " #Contact-list");
            },
        });
    });
});

const ellipsisMenu = document.querySelectorAll('.ellipsis-menu');

ellipsisMenu.forEach(ellipsis => {
    ellipsis.addEventListener("click", (e) => {
        const popup = e.target.parentElement.querySelector(".more-actions");
        const isOpen = popup.classList.contains("show");

        // Close all open popups
        document.querySelectorAll('.more-actions').forEach(otherPopup => {
            otherPopup.classList.remove('show');
        });

        // If clicking the same ellipsis, toggle the popup
        if (!isOpen) {
            // Prevent default behavior
            e.preventDefault();
            // Toggle the visibility of the clicked popup
            popup.classList.toggle("show", !isOpen);
        }

        popup.addEventListener("click", () => {
            document.querySelectorAll('.more-actions').forEach(otherPopup => {
                otherPopup.classList.remove('show');
            });
        })
    });
});