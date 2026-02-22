const products = [
    // Fans
    {
        id: 1,
        category: 'fan',
        brand: 'Havells',
        name: 'Havells Stealth Air 1200mm Ceiling Fan with Remote Control',
        price: 4999,
        originalPrice: 7999,
        discount: 38,
        image: 'image/f1.jfif',
        features: ['1200mm Sweep', 'Remote Control', 'Energy Efficient', '5 Star Rated'],
        rating: 5,
        delivery: 'Express'
    },
    {
        id: 2,
        category: 'fan',
        brand: 'Bajaj',
        name: 'Bajaj Regal Gold 1200mm Decorative Ceiling Fan',
        price: 2499,
        originalPrice: 4299,
        discount: 42,
        image: 'image/f3.jfif',
        features: ['High Speed', 'Decorative Design', '2 Year Warranty'],
        rating: 4,
        delivery: 'Free'
    },
    {
        id: 3,
        category: 'fan',
        brand: 'Orient',
        name: 'Orient Electric Aeroquiet 1200mm Ceiling Fan with BLDC Motor',
        price: 3799,
        originalPrice: 6499,
        discount: 42,
        image: 'image/f3.jfif',
        features: ['BLDC Motor', 'Silent Operation', 'Energy Saving'],
        rating: 5,
        delivery: 'Express'
    },
    {
        id: 4,
        category: 'fan',
        brand: 'Havells',
        name: 'Havells V3 400mm Table Fan with 3 Speed Control',
        price: 1299,
        originalPrice: 1999,
        discount: 35,
        image: 'image/f4.jfif',
        features: ['3 Speed Settings', 'Sweep 400mm', 'Aerodynamic Blades'],
        rating: 4,
        delivery: 'Free'
    },
    {
        id: 5,
        category: 'fan',
        brand: 'Bajaj',
        name: 'Bajaj Midea BW 2200 48-inch Wall Fan',
        price: 2199,
        originalPrice: 3499,
        discount: 37,
        image: 'image/f6.jfif',
        features: ['Wall Mounted', 'Oscillating', 'High Air Delivery'],
        rating: 4,
        delivery: 'Free'
    },
    {
        id: 6,
        category: 'fan',
        brand: 'Orient',
        name: 'Orient Electric Smartcool-D 400mm Personal Fan',
        price: 899,
        originalPrice: 1599,
        discount: 44,
        image: 'image/f5.jfif',
        features: ['Compact Design', 'Portable', '2 Speed Control'],
        rating: 3,
        delivery: 'Free'
    },

    // Geysers
    {
        id: 7,
        category: 'geyser',
        brand: 'Havells',
        name: 'Havells Instanio 3L Instant Water Heater 3000W',
        price: 2999,
        originalPrice: 6399,
        discount: 53,
        image: 'image/g1.jfif',
        features: ['3L Instant', 'LED Indicator', 'Rust Proof Body'],
        rating: 5,
        delivery: 'Express'
    },
    {
        id: 8,
        category: 'geyser',
        brand: 'Havells',
        name: 'Havells Monza EC 15L Storage Water Heater 2000W',
        price: 7499,
        originalPrice: 10999,
        discount: 32,
        image: 'image/g2.jfif',
        features: ['15L Storage', '5 Star Rating', 'Glass Lined Tank'],
        rating: 5,
        delivery: 'Free'
    },
    {
        id: 9,
        category: 'geyser',
        brand: 'Bajaj',
        name: 'Bajaj New Shakti 25L Storage Water Heater',
        price: 6799,
        originalPrice: 11999,
        discount: 43,
        image: 'image/g5.jfif',
        features: ['25L Capacity', 'Titanium Armour', '4 Star Rating'],
        rating: 4,
        delivery: 'Free'
    },
    {
        id: 10,
        category: 'geyser',
        brand: 'Havells',
        name: 'Havells Carlo 6L Instant Water Heater 3000W',
        price: 4299,
        originalPrice: 7999,
        discount: 46,
        image: 'image/g4.jfif',
        features: ['6L Instant', 'Multi Safety Valve', 'Energy Efficient'],
        rating: 5,
        delivery: 'Express'
    },
    {
        id: 11,
        category: 'geyser',
        brand: 'Bajaj',
        name: 'Bajaj Majesty 10L Storage Water Heater',
        price: 5499,
        originalPrice: 8999,
        discount: 39,
        image: 'image/g5.jfif',
        features: ['10L Storage', 'Swirl Flow Technology', '5 Year Warranty'],
        rating: 4,
        delivery: 'Free'
    },
    {
        id: 12,
        category: 'geyser',
        brand: 'Havells',
        name: 'Havells Adonia 25L Storage Water Heater 2000W',
        price: 9999,
        originalPrice: 14999,
        discount: 33,
        image: 'image/g6.jfif',
        features: ['25L Storage', '5 Star BEE', 'Temperature Display'],
        rating: 5,
        delivery: 'Free'
    },

    // Air Conditioners
    {
        id: 13,
        category: 'ac',
        brand: 'Voltas',
        name: 'Voltas 1.5 Ton 5 Star Inverter Split AC',
        price: 34990,
        originalPrice: 54990,
        discount: 36,
        image: 'image/ac1.jfif',
        features: ['1.5 Ton', '5 Star Rating', 'Inverter Technology', 'Copper Coil'],
        rating: 5,
        delivery: 'Free Installation'
    },
    {
        id: 14,
        category: 'ac',
        brand: 'LG',
        name: 'LG 1 Ton 5 Star AI Dual Inverter Split AC',
        price: 32990,
        originalPrice: 49990,
        discount: 34,
        image: 'image/ac2.jfif',
        features: ['1 Ton', 'AI Control', 'Ocean Black Protection', '4 Way Swing'],
        rating: 5,
        delivery: 'Free Installation'
    },
    {
        id: 15,
        category: 'ac',
        brand: 'Voltas',
        name: 'Voltas 1 Ton 3 Star Window AC',
        price: 24990,
        originalPrice: 35990,
        discount: 31,
        image: 'image/ac3.jfif',
        features: ['1 Ton', '3 Star Rating', 'Copper Condenser', 'Anti-Dust Filter'],
        rating: 4,
        delivery: 'Free Installation'
    },
    {
        id: 16,
        category: 'ac',
        brand: 'LG',
        name: 'LG 1.5 Ton 4 Star Inverter Split AC',
        price: 38990,
        originalPrice: 58990,
        discount: 34,
        image: 'image/ac4.jfif',
        features: ['1.5 Ton', 'Dual Inverter', 'HD Filter', 'Low Gas Detection'],
        rating: 5,
        delivery: 'Free Installation'
    },
    {
        id: 17,
        category: 'ac',
        brand: 'Voltas',
        name: 'Voltas 2 Ton 3 Star Split AC',
        price: 41990,
        originalPrice: 64990,
        discount: 35,
        image: 'image/ac5.jfif',
        features: ['2 Ton', 'Stabilizer Free', 'Turbo Cool', 'Sleep Mode'],
        rating: 4,
        delivery: 'Free Installation'
    },
    {
        id: 18,
        category: 'ac',
        brand: 'LG',
        name: 'LG 2 Ton 5 Star Inverter Split AC with WiFi',
        price: 52990,
        originalPrice: 79990,
        discount: 34,
        image: 'image/ac6.jfif',
        features: ['2 Ton', 'WiFi Enabled', 'Voice Control', 'PM 2.5 Filter'],
        rating: 5,
        delivery: 'Free Installation'
    }
];

let filteredProducts = [...products];

function renderProducts(productsToRender) {
    const grid = document.getElementById('product-grid');
    grid.innerHTML = '';

    productsToRender.forEach(product => {
        const isInWishlist = wishlist.find(item => item.id === product.id);
        const wishlistIcon = isInWishlist ? '♥' : '♡';
        const wishlistColor = isInWishlist ? 'color: #ff4757;' : 'color: #999;';

        const card = `
                    <div class="product-card" data-category="${product.category}" data-brand="${product.brand}" data-price="${product.price}" data-discount="${product.discount}" data-product-id="${product.id}" onclick="viewProductDetail(${product.id})">
                        <span class="product-badge">${product.discount}% OFF</span>
                        <button class="wishlist-btn" onclick="toggleWishlist(event); event.stopPropagation();" style="${wishlistColor}">${wishlistIcon}</button>
                        <img src="${product.image}" alt="${product.name}" class="product-image">
                        <div class="product-category">${product.category.toUpperCase()}</div>
                        <h3 class="product-title">${product.name}</h3>
                        <ul class="product-features">
                            ${product.features.map(f => `<li>${f}</li>`).join('')}
                        </ul>
                        <div class="delivery-tags">
                            <span class="delivery-tag ${product.delivery.includes('Express') ? 'express' : ''}">${product.delivery}</span>
                            <span class="delivery-tag">${'⭐'.repeat(product.rating)} Rating</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">₹${product.price.toLocaleString()}</span>
                            <span class="original-price">₹${product.originalPrice.toLocaleString()}</span>
                            <span class="discount">${product.discount}% off</span>
                        </div>
                        <div class="product-footer">
                            <button class="add-to-cart" onclick="addToCart(${product.id}); event.stopPropagation();">🛒 Add to Cart</button>
                            <button class="buy-now" onclick="buyNow(${product.id}); event.stopPropagation();">⚡ Buy Now</button>
                        </div>
                    </div>
                `;
        grid.innerHTML += card;
    });

    document.getElementById('product-count').textContent = productsToRender.length;
}

function filterCategory(category) {
    // Update active button
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');

    if (category === 'all') {
        filteredProducts = [...products];
    } else {
        filteredProducts = products.filter(p => p.category === category);
    }
    renderProducts(filteredProducts);
}

function applyFilters() {
    let filtered = [...products];

    // Category filters
    const categories = [];
    if (document.getElementById('cat-fan').checked) categories.push('fan');
    if (document.getElementById('cat-geyser').checked) categories.push('geyser');
    if (document.getElementById('cat-ac').checked) categories.push('ac');

    if (categories.length > 0) {
        filtered = filtered.filter(p => categories.includes(p.category));
    }

    // Brand filters
    const brands = [];
    if (document.getElementById('brand-havells').checked) brands.push('Havells');
    if (document.getElementById('brand-bajaj').checked) brands.push('Bajaj');
    if (document.getElementById('brand-orient').checked) brands.push('Orient');
    if (document.getElementById('brand-voltas').checked) brands.push('Voltas');
    if (document.getElementById('brand-lg').checked) brands.push('LG');

    if (brands.length > 0) {
        filtered = filtered.filter(p => brands.includes(p.brand));
    }

    // Price filters
    if (document.getElementById('price-1').checked) {
        filtered = filtered.filter(p => p.price < 5000);
    }
    if (document.getElementById('price-2').checked) {
        filtered = filtered.filter(p => p.price >= 5000 && p.price <= 10000);
    }
    if (document.getElementById('price-3').checked) {
        filtered = filtered.filter(p => p.price > 10000 && p.price <= 30000);
    }
    if (document.getElementById('price-4').checked) {
        filtered = filtered.filter(p => p.price > 30000);
    }

    // Rating filters
    if (document.getElementById('star-5').checked) {
        filtered = filtered.filter(p => p.rating === 5);
    }
    if (document.getElementById('star-4').checked) {
        filtered = filtered.filter(p => p.rating >= 4);
    }
    if (document.getElementById('star-3').checked) {
        filtered = filtered.filter(p => p.rating >= 3);
    }

    // Discount filters
    if (document.getElementById('discount-1').checked) {
        filtered = filtered.filter(p => p.discount >= 50);
    }
    if (document.getElementById('discount-2').checked) {
        filtered = filtered.filter(p => p.discount >= 40);
    }
    if (document.getElementById('discount-3').checked) {
        filtered = filtered.filter(p => p.discount >= 30);
    }
    if (document.getElementById('discount-4').checked) {
        filtered = filtered.filter(p => p.discount >= 20);
    }

    filteredProducts = filtered;
    renderProducts(filteredProducts);
}

function clearFilters() {
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        cb.checked = false;
    });
    filteredProducts = [...products];
    renderProducts(filteredProducts);
}

function sortProducts() {
    const sortValue = document.getElementById('sort-select').value;
    let sorted = [...filteredProducts];

    switch (sortValue) {
        case 'price-low':
            sorted.sort((a, b) => a.price - b.price);
            break;
        case 'price-high':
            sorted.sort((a, b) => b.price - a.price);
            break;
        case 'discount':
            sorted.sort((a, b) => b.discount - a.discount);
            break;
        case 'new':
            sorted.sort((a, b) => b.id - a.id);
            break;
        default:
            sorted = [...filteredProducts];
    }

    renderProducts(sorted);
}

// Cart and Wishlist Management
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

function saveWishlist() {
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
}

function updateCartCount() {
    const cartBtn = document.querySelector('.icon-btn[title="Cart"]');
    if (cartBtn) {
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartBtn.setAttribute('data-count', count);
        cartBtn.textContent = count > 0 ? `🛒 ${count}` : '🛒';
    }
}

function updateWishlistCount() {
    const wishBtn = document.querySelector('.icon-btn[title="Wishlist"]');
    if (wishBtn) {
        wishBtn.setAttribute('data-count', wishlist.length);
        wishBtn.textContent = wishlist.length > 0 ? `❤️ ${wishlist.length}` : '❤️';
    }
}

function toggleWishlist(param) {
    // Handle both button element and event object
    let btn = param;
    if (param.target) {
        // It's an event object
        btn = param.target;
        param.stopPropagation();
    }
    
    const card = btn.closest('.product-card');
    const productId = parseInt(card.dataset.productId);

    if (wishlist.find(item => item.id === productId)) {
        wishlist = wishlist.filter(item => item.id !== productId);
        btn.textContent = '♡';
        btn.style.color = '#999';
    } else {
        const product = products.find(p => p.id === productId);
        wishlist.push(product);
        btn.textContent = '♥';
        btn.style.color = '#ff4757';
    }
    saveWishlist();
}

function viewProductDetail(productId) {
    // Store the product ID in localStorage and redirect to detail page
    localStorage.setItem('selectedProductId', productId);
    window.location.href = 'product-view.html?id=' + productId;
}

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            ...product,
            quantity: 1
        });
    }

    saveCart();
    showNotification(`✅ ${product.name} added to cart!`);
}

function buyNow(productId) {
    addToCart(productId);
    setTimeout(() => {
        // Store the current cart and redirect to payment
        localStorage.setItem('cart', JSON.stringify(cart));
        window.location.href = 'payment.html';
    }, 500);
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #4caf50;
                color: white;
                padding: 15px 20px;
                border-radius: 5px;
                z-index: 10000;
                animation: slideIn 0.3s ease-in-out;
            `;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-in-out';
        setTimeout(() => notification.remove(), 300);
    }, 2000);
}

function openCart() {
    const modal = document.getElementById('cart-modal');
    if (!modal) {
        createCartModal();
        updateCartModal();
    } else {
        updateCartModal();
        modal.style.display = 'block';
    }
}

function openWishlist() {
    const modal = document.getElementById('wishlist-modal');
    if (!modal) {
        createWishlistModal();
        updateWishlistModal();
    } else {
        updateWishlistModal();
        modal.style.display = 'block';
    }
}

function createCartModal() {
    const modal = document.createElement('div');
    modal.id = 'cart-modal';
    modal.className = 'modal';
    modal.innerHTML = `
                <div class="modal-content">
                    <span class="close" onclick="closeCart()">&times;</span>
                    <h2>🛒 Shopping Cart</h2>
                    <div id="cart-items"></div>
                    <div class="cart-summary">
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span id="subtotal">₹0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Discount:</span>
                            <span id="total-discount" style="color: #4caf50;">-₹0</span>
                        </div>
                        <div class="summary-item total">
                            <span>Total:</span>
                            <span id="cart-total">₹0</span>
                        </div>
                    </div>
                    <button class="checkout-btn" onclick="checkout()">Proceed to Checkout</button>
                </div>
            `;
    document.body.appendChild(modal);
}

function createWishlistModal() {
    const modal = document.createElement('div');
    modal.id = 'wishlist-modal';
    modal.className = 'modal';
    modal.innerHTML = `
                <div class="modal-content">
                    <span class="close" onclick="closeWishlist()">&times;</span>
                    <h2>❤️ My Wishlist</h2>
                    <div id="wishlist-items"></div>
                </div>
            `;
    document.body.appendChild(modal);
}

function updateCartModal() {
    const itemsDiv = document.getElementById('cart-items');

    if (cart.length === 0) {
        itemsDiv.innerHTML = '<p class="empty-message">Your cart is empty</p>';
        document.getElementById('subtotal').textContent = '₹0';
        document.getElementById('total-discount').textContent = '-₹0';
        document.getElementById('cart-total').textContent = '₹0';
        return;
    }

    let html = '';
    let subtotal = 0;
    let totalDiscount = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        const originalTotal = item.originalPrice * item.quantity;
        const savedAmount = originalTotal - itemTotal;

        subtotal += itemTotal;
        totalDiscount += savedAmount;

        html += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                        <div class="cart-item-details">
                            <h4>${item.name}</h4>
                            <p class="cart-item-price">₹${item.price.toLocaleString()}</p>
                            <p class="cart-item-discount">${item.discount}% off</p>
                        </div>
                        <div class="cart-item-quantity">
                            <button onclick="updateQuantity(${item.id}, -1)">−</button>
                            <input type="number" value="${item.quantity}" min="1" onchange="updateQuantityInput(${item.id}, this.value)">
                            <button onclick="updateQuantity(${item.id}, 1)">+</button>
                        </div>
                        <div class="cart-item-total">
                            <p>₹${itemTotal.toLocaleString()}</p>
                            <button class="remove-btn" onclick="removeFromCart(${item.id})">Remove</button>
                        </div>
                    </div>
                `;
    });

    itemsDiv.innerHTML = html;
    document.getElementById('subtotal').textContent = '₹' + subtotal.toLocaleString();
    document.getElementById('total-discount').textContent = '-₹' + totalDiscount.toLocaleString();
    document.getElementById('cart-total').textContent = '₹' + subtotal.toLocaleString();
}

function updateWishlistModal() {
    const itemsDiv = document.getElementById('wishlist-items');

    if (wishlist.length === 0) {
        itemsDiv.innerHTML = '<p class="empty-message">Your wishlist is empty</p>';
        return;
    }

    let html = '';
    wishlist.forEach(item => {
        html += `
                    <div class="wishlist-item">
                        <img src="${item.image}" alt="${item.name}" class="wishlist-item-image">
                        <div class="wishlist-item-details">
                            <h4>${item.name}</h4>
                            <p class="wishlist-item-price">₹${item.price.toLocaleString()}</p>
                            <p class="wishlist-item-original">₹${item.originalPrice.toLocaleString()}</p>
                            <p class="wishlist-item-discount">${item.discount}% off</p>
                        </div>
                        <div class="wishlist-item-actions">
                            <button class="add-to-cart-btn" onclick="addToCart(${item.id})">Add to Cart</button>
                            <button class="remove-btn" onclick="removeFromWishlist(${item.id})">Remove</button>
                        </div>
                    </div>
                `;
    });

    itemsDiv.innerHTML = html;
}

function updateQuantity(productId, change) {
    const item = cart.find(p => p.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            saveCart();
            updateCartModal();
        }
    }
}

function updateQuantityInput(productId, value) {
    const item = cart.find(p => p.id === productId);
    if (item) {
        item.quantity = parseInt(value) || 1;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            saveCart();
            updateCartModal();
        }
    }
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    saveCart();
    updateCartModal();
    showNotification('Item removed from cart');
}

function removeFromWishlist(productId) {
    wishlist = wishlist.filter(item => item.id !== productId);
    saveWishlist();
    updateWishlistModal();
    showNotification('Item removed from wishlist');
}

function closeCart() {
    const modal = document.getElementById('cart-modal');
    if (modal) modal.style.display = 'none';
}

function closeWishlist() {
    const modal = document.getElementById('wishlist-modal');
    if (modal) modal.style.display = 'none';
}

function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

    // Save total to localStorage
    localStorage.setItem("checkoutTotal", total);

    // Redirect to payment page
    window.location.href = "payment.html";
}


// Initialize on page load
window.addEventListener('load', function () {
    renderProducts(filteredProducts);
    updateCartCount();
    updateWishlistCount();

    // Add event listeners to header buttons
    document.querySelector('.icon-btn[title="Cart"]').onclick = openCart;
    document.querySelector('.icon-btn[title="Wishlist"]').onclick = openWishlist;

    // Close modal when clicking outside
    window.onclick = function (event) {
        const cartModal = document.getElementById('cart-modal');
        const wishlistModal = document.getElementById('wishlist-modal');
        if (event.target === cartModal) cartModal.style.display = 'none';
        if (event.target === wishlistModal) wishlistModal.style.display = 'none';
    }

});