<template>
  <section id="header">
    <div class="wrapper">
      <div class="header-con">
        <ul class="navbar">
          <router-link to="/dashboard">Dashboard</router-link>
          <router-link v-if="account_type == 1" to="/myStore"
            >My Store</router-link
          >
          <router-link to="/logout">Logout</router-link>
        </ul>
      </div>
    </div>
  </section>
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
    <AddProduct :visible="showAddProduct"  @update:visible="toggleAddProduct"/>
  </section>
</template>

<script>
import AddProduct from "./modals/AddProduct.vue";
export default {
  data() {
    return {
      showAddProduct: false,
      account_type: 0,
    };
  },
  components: {
    AddProduct,
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