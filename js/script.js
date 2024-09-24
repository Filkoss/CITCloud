document.addEventListener("DOMContentLoaded", function() {
    fetch("db.php")
        .then(response => response.json())
        .then(data => {
            const postList = document.getElementById("post-list");
            data.forEach(post => {
                const postDiv = document.createElement("div");
                postDiv.classList.add("post");
                postDiv.innerHTML = `<h2>${post.title}</h2><p>${post.content}</p><small>${post.created_at}</small>`;
                postList.appendChild(postDiv);
            });
        })
        .catch(error => console.error('Chyba:', error));
});
