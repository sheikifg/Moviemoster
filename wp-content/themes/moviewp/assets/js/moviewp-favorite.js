jQuery(function (a) {
    const g = document.querySelectorAll("span.favorite .fa-heart-o");
    if (null != typeof g && 0 < g.length) {
        function c(b, c) {
            b ? a(c).attr("data-content", "Remove") : a(c).attr("data-content", "Favorite");
        }
        let d;
        for (localStorage.hasOwnProperty("favorite_movies") ? (d = JSON.parse(localStorage.favorite_movies)) : (localStorage.setItem("favorite_movies", "[]"), (d = [])), i = 0; i < g.length; i++) {
            const a = g[i],
                b = a.id,
                f = a.classList;
            d.includes(b) ? (f.remove("fa-heart-o"), f.add("fa-heart"), c(!0, a)) : c(!1, a),
                a.addEventListener("click", function () {
                    f.toggle("fa-heart-o"),
                        f.toggle("fa-heart"),
                        d.includes(b)
                            ? ((d = d.filter(function (c) {
                                  return c !== b;
                              })),
                              c(!1, a))
                            : (d.push(b), c(!0, a)),
                        (localStorage.favorite_movies = JSON.stringify(d));
                });
        }
    }
});

