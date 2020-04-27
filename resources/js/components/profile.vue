<template>
  <div class="form-group row">
    <label for="photo" class="col-sm-4 col-form-label text-md-right">Photo:</label>
    <div class="col-sm-8">
      <div class="d-flex flex-column">
        <img :src="path" alt="image" width="100px" height="100" class="m-3" />
        <input
          id="photo"
          type="file"
          @change="changeImage"
          class="ml-3 form-control-file img-rounded"
          name="photo"
          value
          required
          autocomplete="photo"
          autofocus
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      path: "/storage/images/default_avatar.png"
    };
  },

  methods: {
    changeImage(event) {
      let path = event.target.value;
      console.log(path);
      //   this.path = path;
    }
  }
};
</script>
