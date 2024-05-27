<template>
  <section id="header">
    <div class="wrapper">
      <div class="header-con">
        <ul class="navbar">
          <router-link to="/dashboard">Dashboard</router-link>
          <router-link v-if="account_type == 1" to="/dashboard">My Store</router-link>
          <router-link to="/logout">Logout</router-link>
        </ul>
      </div>
    </div>
  </section>
  <section id="dashboard">
    <div class="wrapper">
      <div class="dashboard-con">
        <h2>Products</h2>
        <div class="product-list-con">
          <div
            class="product-widget"
            v-for="product in products"
            :key="product.id"
          >
            <div class="product-img-con">
              <img src="../assets/default_product.jpg" alt="Image" />
            </div>
            <div class="product-details">
              <h4>{{ product.product_name }}</h4>
              <p>{{ product.product_description }}</p>
              <p>₱ {{ product.quantity }}</p>
            </div>
            <div class="product-button-con">
              <button class="btn-primary">View more</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      account_type: 0,
    };
  },
  mounted() {
    this.account_type = localStorage.getItem("account_type");
    this.fetchProducts();
  },
  methods: {
    fetchProducts() {
      this.$store.getters.getProducts
        .then((products) => {
          this.products = products;
        })
        .catch((error) => {
          console.error("Error fetching products:", error);
        });
    },
  },
  computed: {
    products() {
      return this.$store.state.products;
    },
  },
};
</script>

<style scoped>
#dashboard .wrapper {
  max-width: 1440px;
}

#dashboard .dashboard-con {
  padding: 100px 0;
}

#dashboard .product-list-con {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

#dashboard .dashboard-con .product-widget {
  padding: 20px;
  border-radius: 10px;
  position: relative;
  overflow: hidden;
  display: flex;
  text-align: center;
  gap: 10px;
  align-items: center;
  flex-direction: column;
  box-shadow: var(--global-shadow);
  background: #e0e7ff;
}

#dashboard .dashboard-con .product-widget::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  transition: 0.2s;
  opacity: 0;
  top: 0;
  left: 0;
  background: linear-gradient(
    360deg,
    rgb(131, 117, 255) 0.01%,
    rgba(126, 108, 192, 0.1) 100%
  );
}

#dashboard .dashboard-con .product-widget:hover::before {
  opacity: 1;
}

#dashboard .dashboard-con .product-widget:hover .product-button-con {
  opacity: 1;
}

#dashboard .product-img-con {
  width: 250px;
  height: 200px;
}

#dashboard .product-button-con {
  transition: 0.2s;
  position: absolute;
  opacity: 0;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

#dashboard .product-img-con img {
  width: 100%;
  object-fit: cover;
  height: 100%;
}
</style>