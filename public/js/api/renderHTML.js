export const loadingAnimate = (display) => { 
    return `<div class="spinner-border spinner-border-sm" role="status" style="display: ${display}">
                <span class="visually-hidden">Loading...</span>
            </div>`;
}

export const preElement = () => {
    const pre = document.createElement('pre');
    pre.style.height = '200px';
    pre.style.overflowX = 'hidden';

    return pre;
};

export const h6Element = () => {
    const h6 = document.createElement('h6');
    h6.textContent = "Response : ";

    return h6;
}