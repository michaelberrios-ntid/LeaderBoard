leaderboardLimit = 5; // default
let lastData = [];
let lastLimit = leaderboardLimit;

async function fetchLeaderboardData() {
  try {
    //  TODO: Fetch the leaderboard data from API and parse as JSON
    const response = await fetch(
      '___FILL_API_URL_HERE___'
    );

    if (!response.ok)
      throw new Error(`HTTP error! status: ${response.status}`);

    const data = await response.json();

    // Only update if data or limit changed
    if (
      JSON.stringify(data) !== JSON.stringify(lastData) ||
      leaderboardLimit !== lastLimit
    ) {
      updateLeaderboardTable(data);
      lastData = data;
      lastLimit = leaderboardLimit;
    }
  } catch (error) {
    console.error("Failed to fetch leaderboard:", error);
  }
}

setInterval(fetchLeaderboardData, 1000);