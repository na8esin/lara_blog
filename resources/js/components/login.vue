<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">ログイン</div>
          <div class="card-body">
            <form @submit.prevent="login">
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                <div class="col-md-6">
                  <input type="email" v-model="email" class="form-control" id="email" />
                </div>
                <span v-if="errors.email">{{ errors.email[0] }}</span>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="password" v-model="password" />
                </div>
                <span v-if="errors.password">{{ errors.password[0] }}</span>
              </div>

              <button class="btn btn-primary">ログイン</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
      errors: [],
    };
  },
  methods: {
    login() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/login", {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            console.log(response);
            localStorage.setItem("auth", "ture");
            this.$router.push("/about");
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
          });
      });
    },
  },
};
</script>