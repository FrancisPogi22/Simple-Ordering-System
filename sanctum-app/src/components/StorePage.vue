<template>
  <HeaderPage />
  <section id="store">
    <div class="wrapper">
      <div class="store-container">
        <div class="header-container">
          <h2>My Store</h2>
          <button @click="toggleAddProduct" class="btn-primary">
            ADD NEW PRODUCT
          </button>
        </div>
      </div>
    </div>
    <AddProduct :visible="showAddProduct" @update:visible="toggleAddProduct" />
  </section>
</template>

<script>
import AddProduct from "./modals/AddProduct.vue";
import HeaderPage from "./partials/HeaderPage.vue";
export default {
  data() {
    return {
      showAddProduct: false,
      account_type: 0,
    };
  },
  components: {
    AddProduct,
    HeaderPage,
  },
  mounted() {
    this.account_type = localStorage.getItem("account_type");
  },
  methods: {
    toggleAddProduct() {
      this.showAddProduct = !this.showAddProduct;
    },
  },
};
</script>

<style scoped>
#store .wrapper {
  max-width: 1440px;
}

#store .store-container {
  padding: 100px 0;
}

#store .header-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 50px;
}
</style>