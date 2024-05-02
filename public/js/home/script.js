$(() => {
    const icons = ["persediaan", "mutu", "rantai", "mitigasi"];

    icons.forEach(icon => {
        const $icon = $(`#${icon}-icon`);
        const $detail = $(`#${icon}-detail`);

        $icon.hover(
            function() {
                $icon.addClass("d-none");
                $detail.removeClass("d-none");
            },
            function() {
                $icon.removeClass("d-none");
                $detail.addClass("d-none");
            }
        );

        $icon.add($detail).click(() => {
            window.location.href = `/${icon}`;
        });
    });
});
