<template>
  <HeaderPage />
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
              <!-- <button class="btn-primary" @click="openPurchaseModal(product)">Purchase</button> -->
              <button class="btn-primary">Edit</button>
              <button class="btn-primary">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <PurchaseOrder :visible="showPurchaseModal" :product="selectedProduct" />
</template>

<script>
import HeaderPage from "./partials/HeaderPage.vue";
import PurchaseOrder from "./modals/PurchaseOrder.vue";
export default {
  data() {
    return {
      account_type: 0,
      showOrderModal: false,
      showPurchaseModal: false,
      selectedProduct: null,
    };
  },
  mounted() {
    this.account_type = localStorage.getItem("account_type");
    this.fetchProducts();
  },
  components: {
    HeaderPage,
    PurchaseOrder,
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
    // openPurchaseModal(product) {
    //   this.selectedProduct = product;
    //   this.showOrderModal = true;
    //   this.showPurchaseModal = true;
    // },
    // closePurchaseModal() {
    //   this.showPurchaseModal = false;
    //   this.showOrderModal = false;
    // },
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
  margin-top: 50px;
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
  flex-direction: column;
  gap: 20px;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

#dashboard .product-button-con button{
 max-width: 150px;
 width: 100%;
}


#dashboard .product-img-con img {
  width: 100%;
  object-fit: cover;
  height: 100%;
}
</style>