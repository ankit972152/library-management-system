
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>
  <body>
    <?php require 'ankit/wel.php' ?>
<!-- <form method="POST" action="cart.php">
    <label>ID:</label><br>
    <input type="text" name="id" ><br>
    <label>Book Name:</label><br>
    <input type="text" name="name" requred oninput="search()"><br><br>
    
   
    <button type="submit" class=" btn btn-primary">submit</button>
     -->
</form>
</body>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
</head>
<body>

    <div class="container mt-5">
      <h1 class="mb-4">Search Book</h1>
      <label for="bookName">Book Name:</label>
      <input type="text" id="bookName" class="form-control" placeholder="Enter book name" oninput="searchBook()">
      <div id="searchResults" class="mt-3"></div>
    </div>

    <!-- JavaScript -->
    <script>
      async function searchBook() {
        const query = document.getElementById("bookName").value;

        if (query.trim().length === 0) {
          document.getElementById("searchResults").innerHTML = ""; // Clear results
          return;
        }

        try {
          const response = await fetch("search.php?name=" + encodeURIComponent(query));
          if (response.ok) {
            const results = await response.json();
            displayResults(results);
          } else {
            document.getElementById("searchResults").innerText = "Error fetching results.";
          }
        } catch (error) {
          console.error("Error:", error);
          document.getElementById("searchResults").innerText = "An error occurred.";
        }
      }

      function displayResults(results) {
        const resultsDiv = document.getElementById("searchResults");
        if (results.length === 0) {
          resultsDiv.innerHTML = "No books found.";
          return;
        }

        const list = results.map(
          (book) => `
            <div class="card mb-2"  >
              <div class="card-body">
              
                <h5 class="card-title">${book.name}</h5>
                <p class="card-text">${book.description}</p>
              </div>
            </div>`
        ).join("");
        resultsDiv.innerHTML = list;
      }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>