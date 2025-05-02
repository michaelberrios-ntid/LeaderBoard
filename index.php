<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Leaderboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/add_player.css">
</head>
<body>

<div class="container leaderboard shadow-lg">
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="m-0 text-center flex-grow-1">🏅 Leaderboard 🏅</h1>
  <div class="dropdown">
    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Show Top <span id="limitDisplay">5</span>
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#" data-limit="5">Top 5</a></li>
      <li><a class="dropdown-item" href="#" data-limit="10">Top 10</a></li>
      <li><a class="dropdown-item" href="#" data-limit="15">Top 15</a></li>
      <li><a class="dropdown-item" href="#" data-limit="20">Top 20</a></li>
    </ul>
  </div>
</div>



  <div class="table-responsive">
    <table class="table table-bordered table-hover text-center align-middle text-white">
      <thead>
        <tr>
          <th>Ranking</th>
          <th>Team</th>
          <th>Matches</th>
          <th>Wins</th>
          <th>Losses</th>
          <th>Ratio</th>
        </tr>
      </thead>
      <tbody id="leaderboard-body">
      </tbody>
    </table>
  </div>

  <!-- Add Player Modal -->
<div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="addPlayerModalLabel">Add New Player</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addPlayerForm">
          <div class="mb-3">
            <label for="playerName" class="form-label">Player Name</label>
            <input type="text" class="form-control" id="playerName" required>
          </div>

          <div id="formError" class="text-danger mb-2"></div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="d-flex justify-content-end mb-3"> 
    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addPlayerModal">
      ➕ Add Player
    </button>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/fetch_leaderboard.js"></script>
<script src="js/add_player.js"></script>
<script src="js/update_stat.js"></script>
<script src="js/update_leaderboard_limit.js"></script>
<script src="js/update_leaderboard.js"></script>
</body>
</html>
