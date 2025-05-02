async function updateStat(playerId, stat) {
  try {
    //  TODO: Complete the API call to update the states
    const response = await fetch(
      "___FILL_API_URL_HERE___",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: playerId, field: stat }),
      }
    );

    const result = await response.json();
    if (!result.success) {
      console.error("Failed to update:", result.error || "Unknown error");
    }
  } catch (err) {
    console.error("Error calling update_stat.php:", err);
  }
}