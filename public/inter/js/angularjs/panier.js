application.controller("panier", function ($scope, $http, uuid) {
    $scope.a = 'panier';
    $scope.auth = false;

    $scope.paniers = []; // panier vide.

    $scope.initialise = function (auth,connexion = false) {
        console.log(auth,connexion);
        // if(connexion) {
        //     $scope.synchronise();
        // }else{
        //     $scope.getCartProducts();
        // }

    };

    // Adding  product to cart
    $scope.addToCart = function(product) {
        // Check if user is logged and insert product to user database cart
        if ($scope.auth) {
            var donnee = $.param(product);
            $http({
                method: 'POST',
                url: $scope.link +`paniers`,
                data: donnee
            }).success(function (data) {
                $scope.getCartProducts();
                // Toast
            });
        } else {
            // If user isn't logged we put the product into local cart
            let cartProduct = this.getLocalCartProducts();

            const prod = cartProduct.find((cartProd) => cartProd.product.id === product.id);
            if (prod) {
                // If product already on the cart the quantity is increase
                prod.qte++;
                const updateCart = cartProduct.map((cartProd) =>
                    cartProd.product.id !== product.id ? cartProd : prod,
                );
                $scope.paniers = updateCart
                localStorage.setItem("cart", JSON.stringify(updateCart));

                // toast
            } else {
                // else product is add to the cart
                let produit = {
                    id: uuid.v4(),
                    product: product,
                    qte: 1
                }

                cartProduct.push(produit);
                $scope.paniers = cartProduct;
                localStorage.setItem("cart", JSON.stringify(cartProduct));
                
                // toast
            }
        }
    }

    // synchronize local cart with user online cart
    $scope.synchronize = function() {
      if (!$scope.isLocalCartEmpty()) {

        var data = { Cart: $scope.getLocalCartProducts() }
        var donnee = $.param(data);
        $http({
            method: 'POST',
            url: $scope.link +'paniers/synchronize',
            data: donnee
        }).success(function (data) {
            localStorage.removeItem('cart');
            $scope.paniers = data;
        });
      }
    }

    // check if local cart is empty
    // return false if isn't empty
    $scope.isLocalCartEmpty = function() {
        return localStorage.getItem("cart") ? false : true;
    }

    // Getting all product from local cart
    $scope.getLocalCartProducts = function() {
        const cart = localStorage.getItem("cart");
        if (!cart) {
            return [];
        } else {
            return JSON.parse(cart);
        }
    }

    // Get all product from cart 
    // if user is logged from online cart
    // if user isn't logged from local cart
    $scope.getCartProducts = function() {
        if (!$scope.auth) {
            $scope.paniers = $scope.getLocalCartProducts();
        } else {
            $http({ method: 'GET', url: $scope.link +'paniers' }).
                success(function (data, status, headers, config) {
                    $scope.paniers = data
                });
        }
    }

      // Edit qty on product on cart (local or online following user login state)
    $scope.editProductCart = function(product_id, qty) {
        if (!$scope.auth) {
            const cart = this.getLocalCartProducts();
            const newCart = cart.map((prod) => {
                if (prod.id == product_id) {
                return {
                    id: prod.id,
                    product: prod.product,
                    qte: qty
                }
                }
                return prod
            });
            $scope.paniers = newCart;
            localStorage.setItem("cart", JSON.stringify(newCart));
        } else {
            var donnee = $.param({ qte: qty });
            $http({
                method: 'PUT',
                url: $scope.link +`paniers/${product_id}`,
                data: donnee
            }).success(function (data) {
                $scope.getCartProducts();
            });
        }
    }

      // delete product on cart (local or online following user login state)
    $scope.removeProductFromCart = function(cartProduct_id) {
        if (!this.authService.isAuth()) {
            const cart = this.getLocalCartProducts();
            const newCart = cart.filter((prod) => prod.id !== cartProduct_id);
            $scope.paniers = newCart;
            localStorage.setItem("cart", JSON.stringify(newCart));
        } else {
            $http({ method: 'DELETE', url: $scope.link +`paniers/${cartProduct_id}` }).
                success(function (data, status, headers, config) {
                    $scope.paniers = data
                });
        }
    }

});
